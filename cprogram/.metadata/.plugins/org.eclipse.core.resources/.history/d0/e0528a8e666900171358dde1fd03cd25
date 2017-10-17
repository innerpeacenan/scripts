#include <stdlib.h>
#include "list.h"
link freelist;

/**
 * 初始化一个闲余链表,用类似数组的方式申请连续内存块,
 * 然后逐个初始化
 */
void initNodes(int N) {
	int i;
	freelist = malloc((N + 1) * sizeof(*freelist));
	for (i = 0; i < N + 1; i++) {
		freelist[i].next = &freelist[i + 1];
	}
	/*
	 * bug :freelist[N] = NULL;
	 * incompatible types when assigning to type ‘struct node’ from type ‘void *’
	 */
	freelist[N].next = NULL;
}

/**
 * x->item 成员表示 i 的位置, 从 1 开始计数
 */
link newNode(int i) {
	link x = deleteNext(freelist);
	x->item = i;
	x->next = x;
	return x;
}

link deleteNext(link x) {
	link t = x->next;
	x->next = t->next;
	return t;
}

/**
 * 将释放的节点重新插入 freelist 中
 */
void freeNode(link x) {
	insertNext(freelist, x);
}

/**
 * 在一个链表节点后插入另一个节点
 */
void insertNext(link x, link t) {
	t->next = x->next;
	x->next = t;
}

link Next(link x) {
	return x->next;
}

itemType Item(link x) {
	return x->item;
}

