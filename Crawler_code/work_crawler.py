# -*- coding: utf-8 -*-
import urllib2, unicodedata, codecs
import timeit
from bs4 import BeautifulSoup

def savePage(soup):
	f6=codecs.open('savePage.html','w','utf-8')
	f6.write(soup.prettify())
	f6.close()

def writeLog():
	f0 = codecs.open('crawler_log.txt', 'w', 'utf-8')
	tmp="Crawled work(s) = "+unicode(work_counter)+'\n'
	tmp=tmp+"Id of final crawled work is "+work_id
	f0.write(tmp+'\n')
	f0.close

def readSoup(url):
    if url.find('http://') < 0:
        url = "http://" + url
    request = urllib2.Request(url)
    response = urllib2.urlopen(request)
    soup = BeautifulSoup(response, 'html.parser')
    savePage(soup)
    return soup

def insertWork(soup):
	#TODO
	#soup = readSoup(work_link)
	###################################
	#work_NAME
	header = soup.find('div', attrs = {'id': 'headerBread'})
	name_list = header.find_all('li')
	work_name = (name_list[len(name_list)-1].span).string
	####################################
	#work_TITLE
	searchDetailBox = soup.find('div', attrs = {'id':'searchDetailBox'})
	work_title = ((searchDetailBox.h2).a).string
	####################################
	#work_image_url + work_content1
	colL = soup.find('div', attrs = {'class': 'colL'})
	work_image_url = ((colL.div).img)['src'][2:]
	#################
	content1 = colL.find_all('p')
	if (content1[0].string != None) and (content1[1].string != None):
		work_content1 = content1[0].string + "<br>" + content1[1].string
	else:
		work_content1 = ""
	####################################
	#work_TIME 
	#Crawled in function insertApply()
	####################################
	#work_content2
	content2 = u"素敵な笑顔で一緒にお店を盛り上げてくれるスタッフを大募集しております。<br>高時給で待遇も厚い！<br>あなたの毎日を更に充実させる環境がマルハンにはあります！<br>あなたの頑張りはしっかり評価致します。<br>頑張りが認めてもらえると更に頑張ろうと言う気持ちになりますよね。<br>研修期間をしっかり設けているので未経験の方も安心して働けますよ。<br>社会人としてのマナーや言葉使い、コミュニケーションのスキルアップなど<br>様々な角度から自分自身を向上させる事が出来ます。"
	#work_content2 = unicode(((searchDetailBox.find_all('p'))[7]).string)
	#if work_content2 == None:
	work_content2 = content2
	####################################
	#work_GUILD_STATION
	infoArea = soup.find('div', attrs = {'id': 'infoArea'})
	work_guild_station = unicode(infoArea.p)[3:][:-4]
	count_symbol=work_guild_station.count('(')
	for count in xrange(count_symbol):	
		flag1 = work_guild_station.find('(')
		flag2 = work_guild_station.find(')')
		work_guild_station = work_guild_station[:flag1] + work_guild_station[flag2+1:]
	####################################
	tmp=u"INSERT INTO `jsen`.`work` (`work_id`, `work_name`, `work_title`, `work_time`, `work_guild_station`, `work_image_url`, `work_content1`, `work_content2`)VALUES"
	tmp=tmp+u"('"+work_id+u"','"+work_name+u"','"+work_title+u"','"+work_time+u"','"+work_guild_station+u"','"+work_image_url+u"','"+work_content1+u"','"+work_content2+u"');"
	f1.write(tmp+'\n')

def insertFeature(infoPoint):
	#TODO
	#soup = readSoup(work_link)
	#infoPoint = soup.find('div', attrs = {'id': 'infoPoint'})
	feature_list = ""
	if infoPoint != None:
		tmp=u"INSERT INTO `jsen`.`feature` (`work_id`, `feature_list`) VALUES"
		for feature in infoPoint.find_all('li'):
			feature_name = str(feature['class'])
			feature_list = feature_list + feature_name + ", "
		tmp=tmp+u"('"+work_id+u"','"+feature_list[:-2]+u"');"
		f2.write(tmp+'\n')
	
def insertPosition(position_list):
	#TODO
	index = -1
	#################################
	#soup = readSoup(work_link)
	#position_list = soup.find('div', attrs ={'class': 'leftBox'})
	position_name_list = position_list.find_all('h4')
	position_info_list = position_list.find_all('table')
	for position_name in position_name_list:
		position_name = position_name.string
		index += 1
		position_info = position_info_list[index].find_all('td')
		if len(position_info) == 2:
			position_content = unicode(position_info[0])[4:][:-5]
			position_salary = unicode(position_info[1])[4:][:-5]
		elif len(position_info) == 1:
			position_content = unicode(position_info[0])[4:][:-5]
			position_salary = ""
		else:
			position_content = ""
			position_salary = ""
		###############################################
		tmp=u"INSERT INTO `jsen`.`position` (`work_id`, `position_name`, `position_content`, `position_salary`) VALUES"
		tmp=tmp+u"('"+work_id+u"','"+position_name+u"','"+position_content+u"','"+position_salary+u"');"
		f3.write(tmp+'\n')

def insertPhoto(photoBox):
	#TODO
	#soup = readSoup(work_link)
	if photoBox != None:
		for photoTable in photoBox.find_all('table', attrs = {'class': 'photoTable'}):
			photo_image = photoTable.find('img', attrs = {'border': '0'})
			photo_image_url = photo_image['src'][2:]
			##########################
			photoTxt = photoTable.find('td', attrs = {'class': 'photoTxt'})
			#############
			txt_title = unicode(photoTxt.div)[:-6]
			flag1 = txt_title.find('>')
			while (flag1) > 0:
				flag1 = txt_title.find('>')
				txt_title = txt_title[flag1+1:]
			photo_title = txt_title
			##############
			txt_content = unicode(photoTxt)[:-5]
			flag2 = txt_content.find('</div>')
			photo_content = txt_content[flag2+6:]
			###########################
			tmp=u"INSERT INTO `jsen`.`photo` (`work_id`, `photo_image_url`, `photo_title`, `photo_content`)VALUES"
			tmp=tmp+u"('"+work_id+u"','"+photo_image_url+u"','"+photo_title+u"','"+photo_content+u"');"
			f4.write(tmp+'\n')

def insertApply(apply_info_list):
	#TODO
	global work_time
	#soup = readSoup(work_link)
	#apply_info_list = soup.find('div', attrs = {'class': 'rightBox'})
	#####################################
	apply_cost = 0
	apply_shop_name = ""
	apply_time = ""
	apply_work_time = ""
	apply_participants = ""
	apply_qualifications = ""
	apply_treatment = ""
	#####################################
	for apply_info in apply_info_list.find_all('tr'):
		if (apply_info.th).string == "祝い金".decode('utf-8'):
			apply_cost = (((apply_info.td).span).string)[:-1]
			index = apply_cost.find(',')
			#apply_COST
			apply_cost = int((apply_cost[:index])+(apply_cost[index+1:]))
		elif (apply_info.th).string == "店舗名".decode('utf-8'):
			#apply_SHOP_NAME
			apply_shop_name = unicode(apply_info.td)[4:][:-5]
		elif (apply_info.th).string == "勤務時間".decode('utf-8'):
			#apply_TIME
			time_string = unicode(apply_info.td)[4:][:-5]
			apply_time = time_string
			##################################
			work_time = time_string
			##################################
		elif (apply_info.th).string == '勤務期間'.decode('utf-8'):
			#apply_work_time
			apply_work_time = unicode(apply_info.td)[4:][:-5]
		elif (apply_info.th).string == '歓迎'.decode('utf-8'):
			#apply_participants
			apply_participants = unicode(apply_info.td)[4:][:-5]
		elif (apply_info.th).string == '応募資格'.decode('utf-8'):
			#apply_qualifications
			apply_qualifications = unicode(apply_info.td)[4:][:-5]
		elif (apply_info.th).string == '待遇'.decode('utf-8'):
			#apply_treatment
			apply_treatment = unicode(apply_info.td)[4:][:-5]
	#####################################
	tmp=u"INSERT INTO `jsen`.`apply` (`work_id`, `apply_cost`, `apply_shop_name`, `apply_time`, `apply_work_time`, `apply_participants`, `apply_qualifications`, `apply_treatment`)VALUES"
	tmp=tmp+u"('"+work_id+u"',"+unicode(apply_cost)+u",'"+apply_shop_name+u"','"+apply_time+u"','"+apply_work_time+u"','"+apply_participants+u"','"+apply_qualifications+u"','"+apply_treatment+u"');"
	f5.write(tmp+'\n')

if __name__ == '__main__':
	global work_id
	##############################
	work_counter = 0
	work_time = ""
	##############################
	source_file = "crawled_work_id.txt"					#work id file
	work_savefile = "data_work.sql"				#1---work
	feature_savefile = "data_feature.sql"		#2---feature
	position_savefile = "data_position.sql"		#3---position
	photo_savefile = "data_photo.sql"			#4---photo
	apply_savefile = "data_apply.sql"			#5---apply
	##############################
	f = codecs.open(source_file, 'r', 'utf-8')
	f1 = codecs.open(work_savefile, 'a', 'utf-8')
	f2 = codecs.open(feature_savefile, 'a', 'utf-8')
	f3 = codecs.open(position_savefile, 'a', 'utf-8')
	f4 = codecs.open(photo_savefile, 'a', 'utf-8')
	f5 = codecs.open(apply_savefile, 'a', 'utf-8')
	##############################
	for line in f:
		work_id = str(line[1:][:-2])
		work_link = "j-sen.jp/"+work_id+"/y"
		print "Crawling work has link : "+work_link
		#########################################
		soup = readSoup(work_link)
		#########################################
		print "insert feature..."
		infoPoint = soup.find('div', attrs = {'id': 'infoPoint'})
		insertFeature(infoPoint)			#2
		#################################
		print "insert position..."
		position_list = soup.find('div', attrs ={'class': 'leftBox'})
		insertPosition(position_list)			#3
		#################################
		print "insert photo..."
		photoBox = soup.find('div', attrs = {'id': 'photoBox'})
		insertPhoto(photoBox)				#4
		#################################
		print "insert apply..."
		apply_info_list = soup.find('div', attrs = {'class': 'rightBox'})
		insertApply(apply_info_list)				#5
		#################################
		print "insert work..."
		insertWork(soup)				#1
		#################################
		print "Done!"
		work_counter += 1
		print "========================================>Work Counter = "+str(work_counter)
		writeLog()
	################################
	print "Crawled Completed!"
	################################
	f.close
	f1.close
	f2.close
	f3.close
	f4.close
	f5.close
