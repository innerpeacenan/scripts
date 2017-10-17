#define MULTIPLY(x,y) (x) * (y)
#include <stdio.h>

int main ()
{
    int num = MULTIPLY(1+2,3);
    printf("num:%d\n", num);
    return 0;
}
