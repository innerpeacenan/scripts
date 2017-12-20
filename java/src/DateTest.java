import java.util.Date;
import java.text.SimpleDateFormat;
public class DateTest {
    public static void main(String args[]) {
        // 初始化 Date 对象
        Date date = new Date();
        SimpleDateFormat ft = new SimpleDateFormat ("yyyy-MM-dd hh:mm:ss");
        System.out.println("Current Date: " + ft.format(date));
        System.out.println();

                ft.parse("2017-02-01")
        // 使用 toString() 函数显示日期时间
        System.out.println(date.toString());
    }
}
