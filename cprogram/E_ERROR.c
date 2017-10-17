#include <stdio.h>
#define E_WARNING                       (1<<1L)


//bug_fix: expected declaration specifiers or ‘...’ before string constant
//printf should excuted in an function
int main ()
{
    printf("the result of 1<<1L is:%d", E_WARNING);
    return 0;
}
