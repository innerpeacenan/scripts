package object;

/**
 * 局部变量覆盖成员变量
 * */
public class VariableCover {

    /*当实例变量与方法中的局部变量同名时，
     *局部变量的值会覆盖实例变量*/
    //定义实例变量
    public String city = "合肥";
    private static String citys = "滁州";
    //定义一个方法
    public void function(){
        //String city = "蚌埠";
        //输出
        //方法中的同名局部变量会覆盖实例变量
        System.out.println(city);//结果：蚌埠
        //要想调用实例变量，可以用this
        System.out.println(this.city);//结果：合肥
    }

    public static void main(String[] args) {
        String city = "上海";
        System.out.println(city);//结果：上海
        //这样也可以
        new VariableCover().function();
    }
}
