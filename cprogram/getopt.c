#include <stdio.h>
#include <stdlib.h>
/*
 * isprint
 */
#include <ctype.h>
#include <unistd.h>

int main (int argc,char **argv)
{
    // 记录输入选项和值的索引
    int index;
    int c;
    int aflag = 0;
    int bflag = 0;
    // get value from user input ,this is a pointer to the first letter of ther user inout string
    // string of c program end up with \0
    char *cvalue = NULL;

    /*
     * The getopt function gets the next option argument from the argument list
     * specified by the argv and argc arguments.
     */
    while((c = getopt(argc,argv,"abc:")) != -1)
        switch (c){
            case 'a':
                aflag = 1;
                break;
            case 'b':
                bflag = 1;
                break;
            case 'c':
                cvalue = optarg;
                break;
            case '?':
                /*
                 * When getopt encounters an unknown option character or an option with a missing required argument,
                 * it stores that option character in this variable.
                 * You can use this for providing your own diagnostic messages.
                 *
                 */
                if(optopt == 'c')
                    fprintf(stderr,"Option -%c require an argument.\n", optopt);
                else if (isprint (optopt))
                    fprintf(stderr,"Unknown option character `\\x%x'.\n", optopt);
                return 1;
            default:
                abort();
        }
    printf ("aflg = %d, bflag = %d, cvalue = %s\n",aflag, bflag, cvalue);
    /*
     * 当输入的选项都是否和要得的输入选项时,optind 和 argc 才相同,否则,argc 后面记录的多出来的选项都是不否和预置选项的
     */
    for (index = optind; index < argc; index ++)
        printf("Non-option argument %s\n",argv[index]);
    return 0;
}


