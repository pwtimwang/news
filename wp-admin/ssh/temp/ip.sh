#!/bin/bash
# �Ψӧ@���@��²�檺�n�J�����I
#############################################################################
# History:
# VBird 2006/11/10
#############################################################################
PATH=/sbin:/usr/sbin:/bin:/usr/bin; export PATH
basedir=/srv/www/startuperi/public_html/wp-admin/ssh/temp
ipnew=$basedir/ip.new

testing=`cat $ipnew`
if [ "$testing" == "yes" ]; then
        if [ -f "$basedir/iptables.ssh.sh" ]; then
                sh $basedir/iptables.ssh.sh
        fi
        echo "" > $ipnew
fi

