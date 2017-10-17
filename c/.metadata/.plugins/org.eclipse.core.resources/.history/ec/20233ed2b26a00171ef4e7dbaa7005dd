#include <stdio.h>
#include <stdlib.h>
#include <assert.h>

#define DEBUG 1
#ifdef DEBUG
#define PR  printf
#else
#define PR(...)
#endif

/************************************************************************
 二叉排序树或者是一棵空树，或者是具有下列性质的二叉树：
 （1）若左子树不空，则左子树上所有结点的值均小于或等于它的根结点的值
 （2）若右子树不空，则右子树上所有结点的值均大于或等于它的根结点的值；
 （3）左、右子树也分别为二叉排序树；

 数据结构改造成功:(在类型申明的时候之前定义为指向结构体的指针)
 // @TODO 需要进一步测试,在删除节点的过程中,可能还存在bug

 *************************************************************************/
typedef int Item;

typedef struct _BiSearchTree {
	Item key;
	struct _BiSearchTree * lChild;
	struct _BiSearchTree * rChild;
}* BiSearchTree;

/**
 *  创建二叉查找树
 *
 *  @return 指向一颗空树的指针
 */
BiSearchTree bisearch_tree_new() {
	return NULL;
}

/**
 *  插入节点
 *  @param tree tree a pointer to the root of a tree
 *  @param node 节点值 new inserted value
 */
BiSearchTree bisearch_tree_insert(BiSearchTree tree, Item node) {
	BiSearchTree t = tree;
	BiSearchTree parent = NULL;
	BiSearchTree newNode = (BiSearchTree) malloc(sizeof(*tree));
	if (NULL == newNode) {
		PR("malloc failure\n");
		return tree;
	}
	newNode->key = node;
	newNode->lChild = NULL;
	newNode->rChild = NULL;
	// if no element created before
	if (NULL == t) {
		tree = newNode;
		PR("insert first node %d!\n", node);
		return tree;
	}

	/*
	 *  跳出循环的时候,t 指向NULL, 但是往回找 t 的父节点,有没办法知道,所以需要每次移动,记录父节点的位置
	 *
	 *  找合适的位置 how to make t point to NULL when insert end
	 *  sink to find location to insert the newNode, until it reach the leaf
	 */
	while (t != NULL) {
		// find right
		if (node > t->key) {
			// parent 的作用理解了
			parent = t;
			t = t->rChild;
		}
		// find left
		else if (node < t->key) {
			parent = t;
			t = t->lChild;
		}
		// ignoreprintf
		else {
			parent = t;
			break;
		}
	}

	if (NULL == parent)
		return tree;
	if (node < parent->key) {
		parent->lChild = newNode;
		PR("insert node %d to left of %d\n", node, parent->key);
	}
	// c 语言种 else if 必须分开写
	else {
		parent->rChild = newNode;
		PR("insert node %d to right of %d\n", node, parent->key);
	}
	return tree;
}

/*
 递归法查找

 对于遇到的每个结点x，都会比较x.key与k的大小，如果相等，就终止查找，
 否则，决定是继续往左子树还是右子树查找。因此，整个查找过程就是从根节点开始一直向下的一条路径，
 若假设树的高度是h，那么查找过程的时间复杂度就是O(h)。
 */
int bisearch_tree_search_recursive(BiSearchTree tree, Item node) {
	BiSearchTree t = tree;
	// 如果数本身为空的话,返回-1,表示查找失败
	if (NULL == t)
		return -1;
	PR("compare with %d:\n", t->key);
	if (node < t->key) {
		// find left
		return bisearch_tree_search_recursive(t->lChild, node);
	} else if (node > t->key) {
		// need to return
		return bisearch_tree_search_recursive(t->rChild, node);
	} else {
		return 0;
	}
}

/*
 * 迭代法查找(循环)
 *
 *@return -1 if the node could not find, or 0 if the node  can be find*
 */
int bisearch_tree_search(BiSearchTree tree, Item node) {
	BiSearchTree t = tree;
	if (NULL == t) {
		return -1;
	}
	while (NULL != t) {
		if (node < t->key) {
			t = t->lChild;
		} else if (node > t->key) {
			t = t->rChild;
		} else {
			return 0;
		}
	}
	return -1;
}

/*
 * 对照这篇贴子,好好研究下节点删除的逻辑
 * http://www.2cto.com/kf/201608/534473.html
 * search and delete
 */
int bisearch_tree_delete(BiSearchTree tree, Item node) {
	BiSearchTree parent = NULL;
	BiSearchTree target = tree;
	BiSearchTree t = tree;
	if (NULL == t) {
		return -1;
	}
	while (t != NULL) {
		if (node < t->key) {
			// 如果没有到叶子节点, parent 往下跟
			if (NULL != t->lChild || NULL != t->rChild) {
				parent = t;
			}
			t = t->lChild;
		} else if (node > t->key) {
			if (NULL != t->lChild || NULL != t->rChild) {
				parent = t;
			}
			t = t->rChild;
		} else {
			// find it, try to delete
			// 如果是叶子节点
			break;
		}
	}

	if (NULL == t) {
		PR("树为空，或想要删除的节点不存在\n");
		return -1;
	}

	if (NULL == t->lChild && NULL == t->rChild) {
		// 删除成功
		PR("delete: %d\n", t->key);
		free(t);
		if (node < parent->key) {
			parent->lChild = NULL;
		} else {
			parent->rChild = NULL;
		}
		return 1;
	}
	// 如果没有左子树
	else if (NULL == t->lChild) {
		if (node < parent->key) {
			parent->lChild = t->rChild;
			PR("delete: %d\n", t->key);
			free(t);
		} else {
			parent->rChild = t->rChild;
			PR("delete: %d\n", t->key);
			free(t);
		}
		return 1;
	}
	// 如果没有右子树
	else if (NULL == t->rChild) {
		if (node < parent->key) {
			parent->lChild = t->lChild;
			PR("delete: %d\n", t->key);
			free(t);
		} else {
			parent->rChild = t->lChild;
			PR("delete: %d\n", t->key);
			free(t);
		}
		return 1;
	}
	// 左右子数都有(这个要重新排列? 貌似比较复杂)
	else {
		// 如果能找到一个比左子树更大的值
//		puts("@TODO");
		// find max from its left
		BiSearchTree lt = t->lChild;
		BiSearchTree lparent = t->lChild;
		// 如果 目标节点的又接点没有右节点,直接将父节点指向作节点
		if (NULL == lt->rChild) {
			if (lt->lChild->key < parent->key) {
				PR("parent->lChild: %d\n", lt->key);
				parent->lChild = lt;
			} else {
				PR("parent->rChild: %d\n", lt->key);
				parent->rChild = lt;
			}
			// 把右侧接上
			lt->rChild = t->rChild;
			PR("delete: %d\n", t->key);
			free(t);

			return 1;
		}
		while (NULL != lt->rChild) {
			lparent = lt;
			lt = lt->rChild;
		}
		lparent->rChild = 0;
		// replace the node to be delete with lmax->key
		PR("replace %d with %d\n", t->key, lt->key);
		t->key = lt->key;
		free(lt);
		return 1;
	}
	return -1;
}

/**
 * 新建, 插入, 删除都完成了
 * 开始写四种遍历方式
 */

/**
 * 中序遍历节点，也就是从小到大输出
 */
void bisearch_tree_inorder_traversal_internal(BiSearchTree tree) {
	BiSearchTree t = tree;
	if (NULL == t)
		return;
	bisearch_tree_inorder_traversal_internal(t->lChild);
	printf("%d, ", t->key);
	bisearch_tree_inorder_traversal_internal(t->rChild);
}

// 利用二插树可以排序
void bisearch_tree_traversal(BiSearchTree tree) {
	printf("[ ");
	bisearch_tree_inorder_traversal_internal(tree);
	printf(" ]\n");
}

/**
 * 二级指针智能修改一级指针值存在的情况下指针的内容而不许要返回值(也就是引用修改值)
 * 因此, STACKinit 初始化需要需要返回值
 */
int main(int argc, char **argv) {
	BiSearchTree tree = bisearch_tree_new();
	if (argc < 4) {
		fputs("Usage: 至少输入3个数字,最后两个数字用于查找之前插入的数字", stderr);
	}
	for (int i = 1; i < argc - 2; i++) {
		// 每次返回该指针后,在此基础上,再添加新节点(不然每次都传入i)
		tree = bisearch_tree_insert(tree, atoi(argv[i]));
	}
	bisearch_tree_traversal(tree);
	int num_to_find = atoi(argv[argc - 2]);
	PR("finding %d\n", num_to_find);
	int find = bisearch_tree_search_recursive(tree, num_to_find);
	if (0 == find) {
		PR("find\n");
	} else {
		PR("could not find\n");
	}

	num_to_find = atoi(argv[argc - 1]);
	PR("finding %d\n", num_to_find);
	find = bisearch_tree_search(tree, num_to_find);
	if (0 == find) {
		PR("find\n");
	} else {
		PR("could not find\n");
	}
	bisearch_tree_delete(tree, 9);
	bisearch_tree_traversal(tree);
	find = bisearch_tree_search(tree, 1);
	if (0 == find) {
		PR("find 1\n");
	} else {
		PR("could not find 1\n");
	}
}

