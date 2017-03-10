graph * ::=Empty|Node * [graph *]

glist ::[graph num]
glist =[Node 23[(glist!1),(glist!2)],
        Node 13[Empty,(glist!2)],
        Node 5[(glist!0),(glist!1)]
        ]

testgraph :: graph num
testgraph = hd glist

mymember :: ([*],*)-> bool
mymember ([],item)= False
mymember (item:rest, item) =True
mymember (front:rest, item)=mymember(rest,item)

nlist == [num]
printgraph :: ([num],graph num) ->[char]
printgraph (nlist, Empty)  = "empty"
printgraph (nlist, Node x (ns)) = "Node"++( shownum x )++"("++printgraph(x:nlist,hd ns)++")("++printgraph(addlist(x:nlist,hd ns),last ns)++")", if ~mymember(nlist,x)
printgraph (nlist, Node x (ns)) = "Seen"++(shownum x), if mymember(nlist,x)

addlist(nlist, Empty) = nlist
addlist(nlist, (Node x (ns))) = addlist(x:nlist, hd ns)++addlist(x:nlist,last ns),if ~mymember(nlist,x)
                              = nlist, otherwise
