#include <stdio.h>
#include <stdlib.h>
#include "newList.h"

/* copies an item tinto a node*/
static void CopyToNode (Item item, Node *pnode){
    /* structure copy */
    pnode->item = item;
};

/**
 * opration: initialize a list
 *
 * preconditions: plist points to a list
 *
 * postconditon: the list is initialized to empty
 *
 */
void InitializeList(List *plist){
    // *plist = NULL;
    // incompatible types when assigning to type ‘List
    plist->head = NULL;
    plist->size = 0;
}


/* return true if list is empty */
// should use const, make it in compatible with head file
int ListIsEmpty(const List *plist){
    // plist->head point to the first node of the single list
    // use == ,not =
    // or :
    if(plist->head == NULL){
        // mean true
        return 1;
    }else{
        // mean false
        return 0;
    }
}


/**
 * 防止内存不够用
 * indict whether a list is full
 */
int ListIsFull( const List * plist){
    Node *pt;
    int full;
    // c++ 对指针类型要求比 C 严格,养成转和的习惯
    pt = (Node *) malloc(sizeof(Node));

    if(NULL == pt){
        full = 1;
    }else{
        full = 0;
    }
    // 不要留下野指针
    free( pt );
    return full;
}

/* returns number of nodes */
unsigned int ListItemCount (const List * plist){
    unsigned int count = 0;
    /*set to start of list */
    //TODO  这一块关于指针的含义
    // incompatible types when initializing type ‘Node * {aka struct node *}’ using type ‘Node //](https://stackoverflow.com/questions/44918988/why-a-pointer-to-list-can-also-point-to-node/44920255#44920255)
    Node *pnode = plist->head;
    while (pnode != NULL){
        // test what the difference count++ and ++count
        count++;
        // go next
        pnode = pnode->next;
    }
    return count;
}



/**
 * 新申请一个节点占用的内存,将item 赋值给 node, 将 next 设置未 NULL
 * create node to hold item and add it to the end of
 * the list pointed to by plist (slow implementation)
 */
int AddItem (Item item, List * plist){
    Node *scan = plist->head;
    Node *pnew;
    pnew = (Node *) malloc(sizeof(Node));
    /* quit function on failure */
    if(pnew == NULL)
        return 0;
    // pnew->item = item
    CopyToNode (item, pnew);
    pnew->next = NULL;
    /* empty list, so place */
    if( scan == NULL ){
        /* pnew at head of list */
        plist->head = pnew;
    }else{
        while(scan->next != NULL){
            /* find end of list */
            scan = scan->next;
        }
        /* add pnew to end */
        scan->next = pnew;
    }
    // 1 means that the item was added successfully
    return 1;
}



/**
 * 第二个参数为一个指针函数,可以对具体的一个 Item 执行相应的造作,如同样是打印操作,
 * 可以执行打印未 text, html,xml等多种格式的,这个是面向接口编程的魅力所在
 *
 * Also note that the listing
 * has code for the showmovies() function, which conforms to the prototype required by
 * Traverse(). Therefore, the program can pass the pointer showmovies to Traverse() so that
 * Traverse() can apply the showmovies() function to each item in the list.
 */
void Traverse( List *plist, void (*pfun)(Item item)){
    Node *pnode = plist->head;
    while(pnode != NULL){
        /* apply function to item */
       (*pfun)(pnode->item);
       /* advance to next item */
       pnode = pnode->next;
    }
}


/*
 * free memory allocated by malloc()
 * set list pointer to NULL
 */
void EmptyTheList( List *plist ){
    Node *head = plist->head;
    Node *psave;
    while(head != NULL){
        /* save address of next node */
        psave = head->next;
        free(head);
        // TODO deal with list head and list count property
    }
}


