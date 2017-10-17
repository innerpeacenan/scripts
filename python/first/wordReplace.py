#!/usr/bin/env python
# encoding: utf-8
'''
英语词汇中，有一个“词根”的概念，就是可以从词根后面加一些其他词语来组成一个新的长一点的词，
叫做“衍生词”。例如，“an” 词根后跟“other”，就可以组成一个新词“another”。
现在，给出一个包含许多词根的字典，和一个句子。你需要将句子中所有的衍生词替换为它对应的词根
如果一个衍生词有对应多个词根使用最短的词根来进行替换。
'''
def replace_root(dicts, sentence):
    '''
    先将sentence 拆为list,通过两层循环解决
    >>> dicts = ["cat", "bat", "rat"]
    >>> sentence = "the cattle was rattled by the battery"
    >>> result = replace_root(dicts, sentence)
    >>> print(result == "the cat was rat by the bat")
    True

    >>> dicts = ["cattl","att","cat", "bat", "rat"]
    >>> sentence = "the cattle was rattled by the battery"
    >>> result = replace_root(dicts, sentence)
    >>> print(result)

    '''
    map = dict()
    words = sentence.split()
    #print(words)
    dicLen = len(dicts)
    wordsLen = len(words)
    for w in range(wordsLen):
        for d in range(dicLen):
            if len(words[w]) >= len(dicts[d]):
                # compare word with each root
                for j in range(len(dicts[d])):
                    if dicts[d][j] != words[w][j]:
                        break
                # 说明找到了
                # print(j+1, len(dicts[d]))
                if j + 1 == len(dicts[d]):
                    if w not in map or len(dicts[d]) < len(dicts[map[w]]):
                        map[w] = d
                #end for
        #end for
    #end for
    #print(map)
    for w in range(wordsLen):
        if w in map:
            words[w] = dicts[map[w]]

    return " ".join(words)

if __name__ == '__main__':
   import doctest
   doctest.testmod()


