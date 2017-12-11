import table

def exceptlist(arr):
    modellist = []
    for item in arr:
        newitem = item.split('_')
        seconditem = ''
        for j in range(1,len(newitem)):
            seconditem += newitem[j].capitalize()
        modellist.append(seconditem)
    return modellist

# tables 要以模块的属性去调用
newlist = exceptlist(table.tableNames)
print(length)
print(newlist)


