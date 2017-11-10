import java.util.*;

public class CollectionTest
{
    public static void main(String[] args)
    {
        // ArrayList implemented List
        List<String> l1 = new ArrayList<String>();
        l1.add("first element");
        l1.add("adding n elements requires O(n) time");
        l1.add("has size ,isEmpty,get, set,iterator .etc opration");
        l1.add("note that it is unsynchronized");
        l1.remove(0);
        assert "has size ,isEmpty,get, set,iterator .etc opration" == l1.get(1):"去除一元素后,数组索引进行了重新排列";
        assert 3 == l1.size() : "去除一个数组后,数组大小不等于3吗?";
    }
}
