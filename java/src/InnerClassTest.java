public class InnerClassTest
{
    public static void main (String[] args)
    {

        Human me = new Human("Vamei");
        me.drinkWater(0.3);
    }
}

class Human
{
    private String name;

    private Cup myCup;

    public Human (String name){
        this.name = name;
        this.myCup = new Cup();
    }

    public void drinkWater (double w)
    {
       myCup.useCup(w);
       assert true == (myCup.getWater() - 0.7 < 0.01) : "problem with double type compare?";
    }

    class Cup
    {
        private double water = 1.0;

        public void useCup (double w)
        {
            this.water = this.water - w;
        }

        public double getWater()
        {
            return this.water;
        }
    }
}
