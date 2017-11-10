import java.util.*;
public class HashSetTest
{
    public static void main (String[] args)
    {
        Set<Integer> s1 = new HashSet<Integer>();
        s1.add(4);
        s1.add(5);
        s1.add(4);
        // 集合实现了一个 toString 方法
        System.out.println(s1);
        // java type casting
        assert true == s1.toString().equals("[4, 5]") : "why?";
        assert 2 == s1.size() : "set could not contains duplicated elements, not right am I?";
        Iterator i = s1.iterator();
        while(i.hasNext()){
            System.out.println(i.next());
        }
    }
}
