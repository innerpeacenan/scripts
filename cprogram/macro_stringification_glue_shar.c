#include <stdio.h>
#include <stdlib.h>
#define WARN_IF(EXP) \
    do { if(EXP)\
        fprintf(stderr, "Warning: " #EXP "\n");}\
    while(0)


int main ()
{
    int x = 0;
    WARN_IF( x == 0);
    return 0;
}
