main()
{
    char ch=0;
    ch=(char)(48+(ch+1)%2);
    printf("%c",ch);
     ch=48+(ch+1)%2;
    printf("\n%c",ch);
}
