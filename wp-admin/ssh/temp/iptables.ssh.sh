/sbin/iptables  -I INPUT -i  eth1  -p tcp -s  1.203.11.66  --dport 22 -j ACCEPT 
