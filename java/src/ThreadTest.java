public class ThreadTest
{
    public static void main(String[] args)
    {
        NewThread thread1 = new NewThread();
        NewThread thread2 = new NewThread();
        thread1.start(); // start thread1
        thread2.start(); // start thread2
    }
}

/**
 * create new thread by inheriting Thread
 */
class NewThread extends Thread {
    private static int threadID = 0;

    /**
     * contructor
     */
    public NewThread (){
        super("ID:" + (++threadID));// shared by all
        // why?
        assert ("ID:" + (threadID)) == super.getName() : "error in construct!";
    }

    public String toString(){
        return super.getName(); // such as,ID: 1, named by constructor
    }

    /**
     * this method comes form interface runable
     */
    public void run (){
        System.out.println(this);
    }
}
