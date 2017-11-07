import java.io.*;

public class IOTest
{
    public static void main(String[] args)
    {
        try {
            // BufferedReader 注意拼写
            BufferedReader br = new BufferedReader(new FileReader("file.txt"));
            String line = br.readLine();
            while(null != line){
                System.out.println(line);
                line = br.readLine();
            }
            br.close();
        }
        catch(IOException e) {
            System.out.println("IO Problem");
        }
    }
}
