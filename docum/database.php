<pre>
created Fri, 03 August 2018

+-----------------------+
|		  admin 		|
------------------------+
| adminid	int(5)		|
| email		varchar(50)	|
| password	varchar(255)|
| username	varchar(50)	|
| name		varchar(50)	|
| avatar	varchar(255)|
| cover		varchar(255)|
| regdate	timestamp	|
| lastlog	timestamp	|
| verified	int(1)		|
| active	int(1)		|
| banned	int(1)		|
+-----------------------+

created Fri, 03 August 2018

+-----------------------+
|		  user 			|
+-----------------------+
| userid	int(5)		|
| email		varchar(50)	|
| password	varchar(255)|
| username	varchar(50)	|
| name 		varchar(50)	|
| avatar	varchar(255)|
| cover		varchar(255)|
| regdate	timestamp	|
| lastlog	timestamp	|
| bio		varchar(255)|
| gender	int(1)		|
| verified	int(1)		|
| active	int(1)		|
| banned	int(1)		|
+-----------------------+

created sat, 04 August 2018

+---------------------------+
|		   article			|
+---------------------------+
| articleid		int(5)		|
| category		int(5)		|
| userid		int(5)		|
| created		timestamp	|
| modified		timestamp	|
| title 		varchar(255)|
| image			varchar(255)|
| article		text 		|
| keyword		varchar(255)|
| permission	int(1)		|
| deletes		int(1)		|
| link 			varchar(255)|
| shorten		varchar(6)	|
+---------------------------+

created sun, 05 August 2018

+---------------------------+
|		   category 		|
+---------------------------+
| categoryid 	int(5)		|
| categoryname	varchar(255)|
| active 		int(1)		|
| created		timestamp	|
| deletes		int(1)		|
+---------------------------+

created mon, 06 August 2018

tb comments
tb replys

created mon, 06 August 2018
 tb badwords

</pre>