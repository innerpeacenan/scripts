public class Test
{
    public static void main(String[] args)
    {
        Human aPerson = new Human();
        Class c1      = aPerson.getClass();
        System.out.println(c1.getName());
        String name = "Human";
        assert c1.getName() instanceof String: "the class name is not Human?";

        Human anotherPerson = new Woman();
        Class c2      = anotherPerson.getClass();
        System.out.println(c2.getName());
    }
}

class Human
{
    /**
     * accessor
     */
    public int getHeight()
    {
       return this.height;
    }

    /**
     * mutator
     */
    public void growHeight(int h)
    {
        this.height = this.height + h;
    }
private int height;
}


class Woman extends Human
{
    /**
     * new method
     */
    public Human giveBirth()
    {
        System.out.println("Give birth");
        return (new Human());
    }

}
