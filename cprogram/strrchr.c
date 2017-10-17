#include <stdio.h>
#include <string.h>

int main (){
    const char haystack[] = "http:www.note.com";
    const char needle = '.';
    char *ret;
    ret = strrchr(haystack,needle);
    printf("String after |%c| is - |%s|\n",needle,ret);
    return 0;
}

