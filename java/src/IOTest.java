import java.io.*;

public class IOTest
{
    public static void main(String[] args)
    {
        try {
            String longstr = "847F2CC2E59EE9CC462FE71CF14AD09carType2cargo家具生活用品等cityCode0755commitIdentifier0contactPhone18923877702destinationAddress广东省深圳市宝安区福永街道和平社区蚝业路33号destinationContact胡先生destinationPhone15900000004orderCodingWQ1712-0000239pickupAddress广东省深圳市宝安区沙井街道万丰社区万丰98工业城第10栋101铺位pickupName黄斌宝安stayTime2tailPlate1trunkRequirement刘庆林测试12111152vendorCodeyunniaovolume5weight2500";
            transform(longstr);
            System.exit(0);

            OutputStream output = new FileOutputStream("/tmp/xdebug.log");
            PrintStream printOut = new PrintStream(output);
            System.setOut(printOut);
            System.out.println("本来应该输入到 console 的信息,现在被重新定向到了这个文件了");
            System.exit(0);

            File file = new File("/tmp/xdebug.log");
            if(file.exists()){
                System.err.println("file exist!");
            }else{
                System.out.println("file not exist!");
                boolean created = file.createNewFile();
                if(created){
                    System.out.println("now we created a new file");
                }else{
                    System.out.println("fail to create a new file");
                    System.exit(1);
                }
            }

            String data  = "文本内容,可能是爬虫得到的 cookie ";
            // 构造函数的第二个参数表示是否追加
            // 要用getAbsolutePath()
            // File, FileWriter, BufferedWriter
            FileWriter fileWriter = new FileWriter(file.getAbsolutePath());
            BufferedWriter bufferedWriter = new BufferedWriter(fileWriter);
            bufferedWriter.write(data);
            bufferedWriter.close();
            System.out.println("done,file is:" + file.getAbsolutePath());
            System.exit(0);

            FileOutputStream in = new FileOutputStream(file);
            byte bt[] = new byte[1024];
            String str = "文本内容,可能是爬虫得到的 cookie ";
            bt = str.getBytes();
            in.write(bt, 0, bt.length);
            in.close();
            System.exit(1);

            // getParent() 是成员方法
            System.out.println(file.getParent());
            System.exit(0);
            // user.dir 是系统属性
            System.out.println(System.getProperty("user.dir"));
            System.exit(0);
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

    public static void transform(String str){
        StringReader sr = new StringReader(str);
        StringWriter sw = new StringWriter();
        // 10 个10个字符处理,目的是为了演示程序在处理长字符串的过程的的处理方式
        char[] chars = new char[10];
        try{
            int len = 0;
            while((len = sr.read(chars)) != -1){
                // public String(byte[] bytes, int offset, int length)
                String strRead = new String(chars, 0, len).toUpperCase();
                System.out.println("thisLine:" + strRead);
                sw.write(strRead);
                // should flush, or may lead to buffer overflow and content missing
                sw.flush();
            }
            sr.close();
            sw.close();
        } catch (IOException e){
            e.printStackTrace();
        } finally {
            sr.close();
            try{
                sw.close();
            }catch(IOException e){
                e.printStackTrace();
            }
        }
    }
}
