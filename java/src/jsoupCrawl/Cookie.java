import java.util.Map;
import java.util.HashMap;
import java.io.IOException;
import org.jsoup.Jsoup;
import org.jsoup.Connection.Method;
import org.jsoup.Connection.Response;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;

public class Cookie {
    public static Map <String, String> cookies;
    public static void main (String[] args){
        // only static method could be reffered as function
        // 这个作为静态方法的典范
        getNotes();
    }

    public static void getNotes(){
        // 学习javaio 文件读取和保存
        cookies = new HashMap<String, String> ();
        try {
            // 登录后为什么没有成功设置session呢? 想一想
            // 学习 IO 中的文件存取
            cookies.put("makeLifeEasier", "npg6a6jm26u62qo0obmerohgg0");
            String doc = doGetNoteList();
            if(needLogin(doc)){
                //System.out.println("log in");
                cookies = login();
                //System.out.println("retry");
                doc = doGetNoteList();
            }
            System.out.println(doc);
        }catch(IOException e){
            e.printStackTrace();
        }
    }

    public static String doGetNoteList () throws IOException {
        String url = "http://www.note.com:88/item/items?fid=";
        //System.out.println("actual" + cookies);
        String json = Jsoup
            .connect(url)
            .cookies(cookies)
            .header("Content-type","application/json; charset=utf-8")
            .ignoreContentType(true)
            .get()
            .body()
            .html();
        return json;
    }

    public static boolean needLogin(String doc){
        if(doc.contains("id=\"login\">登录</button>")){
            //System.out.println("need to login");
            return true;
        }
        return false;
    }

    public static Map<String, String> login () throws IOException {
        String url = "http://www.note.com:88/login/in";
        Response response =  Jsoup.connect(url)
            // data must before metod,terrible
            // 这里不需要你encdoe, jsoup 会帮你做
            .data("name", "909312359@qq.com")
            .data("passwd", "nxn2382502")
            .method(Method.POST)
            .execute();
        Map<String, String> cookies = response.cookies();
        //System.out.println(response.body());
        return cookies;
    }
}

