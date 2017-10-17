#include <stdio.h>
#include <string.h>

int main (){
    char str[] = "what ever!";
    // 函数本身接受的就是一个指针
    memset(str,'\0',6);
    char *pos = str+6;
    puts(pos);
    return 0;
}

