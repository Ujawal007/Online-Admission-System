main()
{

    int n;
    scanf("%d",&n);
    int a[n];
    int i;
    for(i=0;i<n;i++)
        scanf("%d",&a[i]);

    int h=index(a,n);
    printf("H index = %d",h);
}
int index(int a[],int n)
{
    int l=0;
    int h=n-1;
    int m;
    while(l<=h)
    {
         m=(l+h)/2;
        if(a[m]==(m+1))
            return a[m];
        else if(a[m]>(m+1)) // move to lower values
            l=m+1;
        else
            h=m-1; // move to higher values
    }
    return h+1;
}
