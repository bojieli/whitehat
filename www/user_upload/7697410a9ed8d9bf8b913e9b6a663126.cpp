#include <cstdio>
#include <cstring>
#include <algorithm>
#define NN 105
int f[NN];
int b[NN];
inline int MAX(int x, int y)
{
    return (x>y?x:y);
}
class node 
{
    public:
        int num, pos,rank;
        friend bool operator<(node x, node y)
        {
            return x.num < y.num;

        }

} a[NN];
int tree[NN];
inline void insert(int p, int x)
{
    while (p < NN-1)

    {
        tree[p] = MAX(tree[p], x);
        p=p+(p&(-p));
    }
}
inline int find(int p)
{
    int x(0);
    while (p > 0) 
    {
        x=MAX(tree[p], x); 
        p=p-(p&(-p));
 
    }
    return x;
}
int main()
{
    int n,k;
    scanf("%d", &n);
    for (int i=1;i<=n;++i)
    {
        scanf("%d", &k);
        for (int j=1;j<=k;++j)
        {
            scanf("%d", &a[j].num);
            a[j].pos=j;
        }
    

        std::sort(a+1, a+k+1);
        int t=2;
        a[1].rank = 2;
        for (int j=2;j<=k;++j)
            if (a[j].num > a[j-1].num) a[j].rank = ++t;
            else a[j].rank = t;
        for (int j=1;j<=k;++j) b[a[j].pos]=a[j].rank;

        
        memset(tree, 0, sizeof(tree));
        memset(f, 0, sizeof(f));
        for (int j=1;j<=k;++j)
        {
            f[j] = find(b[j]) + 1;
            insert(b[j],f[j]);
        }
        int ans(0);
        for (int j=1;j<=k;++j) ans=MAX(ans, f[j]);
        printf("%d\n", ans);
    }
    return 0;
}
