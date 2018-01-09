import java.util.HashSet;

/**
 * https://zhuanlan.zhihu.com/p/32178470
 */
public class ReverseVowels{
    public String reverseVowels(String s){
        HashSet<Character> vowel = new HashSet<Character>();
        vowel.add('A');
        vowel.add('E');
        vowel.add('I');
        vowel.add('O');
        vowel.add('U');
        vowel.add('a');
        vowel.add('e');
        vowel.add('i');
        vowel.add('o');
        vowel.add('u');

        // length method, not property
        int len = s.length();
        char[] ans = new char[len];
        ans = s.toCharArray();
        int i = 0;
        int j = len - 1;
        char tmp;

		// 这个当时费了点时间,想想二分查和交换排序的处理方式
        while(i < len && j > 0 && i <= j){
            if (!vowel.contains(s.charAt(i))){
                i++;
                continue;
            }
            if(!vowel.contains(s.charAt(j))){
                j--;
                continue;
            }

            System.out.println(ans[i]);
            // swith
            tmp = ans[i];
            ans[i] = ans[j];
            ans[j] = tmp;
            i++;
            j--;
        }

        return String.valueOf(ans);
    }


    public static void main (String[] args){
        ReverseVowels r =  new ReverseVowels();
        String str = "hello";
        str = r.reverseVowels(str);
        System.out.println(str);
        String st = "leetcode";
        st = r.reverseVowels(st);
        System.out.println(st);
    }
}
