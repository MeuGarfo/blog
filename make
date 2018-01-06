#!/bin/bash
php=`which php`

superUser()
{
	touch ../offline
	clear
	echo "criando super usuário..."
	$php bin/superUser.php
	rm ../offline
}

clear

if [ -z "$1" ]
	then
		echo "Digite a opção:"
		echo "1) criar super usuário (default)"
		printf "Opção número "
		read opt
	else
		opt=$1
fi

case $opt
in
	1) superUser ;;
	*) superUser ;;
esac
