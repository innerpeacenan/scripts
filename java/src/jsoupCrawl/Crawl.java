import org.jsoup.Jsoup;
import org.jsoup.connection.Response;
import org.jsoup.nodes.Document;
import org.jsoup.nodes.Element;
import org.jsoup.select.Elements;
import java.io.IOException;

public class Crawl {
    public static void getUrl(String url) {
        try {
            Document doc = Jsoup.connect(url)
                //.data("query", "Java")
                //.userAgent("头部")
                //.cookie("auth", "token")
                //.timeout(3000)
                //.post()
                .get();
            Element content = doc.getElementById("layout-content");
            Elements newsContent = content.select("div.newsContent");
            Elements ul = newsContent.select("ul");
            System.out.println("newsContent links are:");
            for(Element li : ul){
                Elements anchor = li.select("a[href]") ;
                for(Element a : anchor){
                    String uri = a.attr("href");
                    System.out.println(uri);
                }
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public static void main (String[] args){
        String url = "http://php.net/";
        getUrl(url);
    }
}
