import java.util.*;

public class HashMapTest
{
    public static void main (String[] args){
        Map<String, Integer> m1 = new HashMap<String, Integer> ();
        m1.put("java", 1);
        m1.put("php", 2);
        assert true == m1.get("php").equals(2) : "has Map error?";
    }
}
