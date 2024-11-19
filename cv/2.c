main()
{
    char ch;
    scanf("%c",&ch);
    ch=((ch-97+1)%26)+97;
    printf("%c\n",ch);
}
