import java.util.Scanner;

public class ScannerTest {

    public static void main (String[] args){
        Scanner cin = new Scanner(System.in);
        System.out.println("请输入商家ID");
        String shopid = cin.next();
        System.out.println("请输入商品ID");
        String itemid = cin.next();
        System.out.println("请输入每页评论数量");
        String pagesize = cin.next();
    }
}
