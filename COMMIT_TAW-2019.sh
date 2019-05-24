now=$(date +'%d-%m-%Y') 
echo ${now}
git init
git add .
git commit -m "${now}"
git remote set-url origin https://github.com/1630444/TAW-2019.git
git push -u origin master
1630444
estanque98
