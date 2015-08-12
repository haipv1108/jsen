# -*- coding: utf-8 -*-
import urllib2, unicodedata, codecs
import timeit
from bs4 import BeautifulSoup

def readSoup(url):
    if url.find('http://') < 0:
        url = "http://" + url
    request = urllib2.Request(url)
    response = urllib2.urlopen(request)
    soup = BeautifulSoup(response, 'html.parser')
    return soup

def insertWorkFromStation(station_link):
    global work_counter
    ####################################
    step = 0
    ####################################
    soup = readSoup(station_link)
    workBoxs = soup.find_all('div', attrs = {'class', 'searchResultBox'})
    for workBox in workBoxs:
        #work id
        work_id = str(((workBox.h2).a)['href'])[1:][:-2]
        tmp=u"INSERT INTO `jsen`.`work` (`work_id`, `station_id`) VALUES"
        tmp=tmp+u"('"+work_id+u"',"+unicode(station_id)+u");"
        f.write(tmp+'\n')
        ######################################
        step += 1
        work_counter += 1
        print "Number of work = "+str(step)
    print "=============================================>Work Counter = "+str(work_counter)+" | Sta_id = "+str(station_id)+" at city id = "+str(city_id)+" Pre_id = "+str(prefecture_id)
    #loop jump next page
    if(soup.find('li', attrs = {'class', 'next'}) != None):
        jump = soup.find('li', attrs = {'class', 'next'})
        jump_link = "j-sen.jp"+str((jump.a)['href'])
        if jump_link != station_link and station_id != 1240:
            station_link = jump_link
            print "Jump to next page.............."
            insertWorkFromStation(station_link)

def insertStation(city_url):
    global station_id
    soup = readSoup(city_url)
    for station_list in soup.find_all('ul', attrs ={'class', 'itemList'}):
        for station in station_list.find_all('a'):
            #station_name = station.string
            station_link = "j-sen.jp"+str(station['href'])
            flag1 = (station_link.find('station_')) + 8
            flag2 = station_link.find('.htm')
            station_id = int(station_link[flag1 : flag2])
            print "We crawling work of station has id = "+str(station_id)
            insertWorkFromStation(station_link)

def getCity(prefecture_url):
    global city_id
    soup = readSoup(prefecture_url)
    citys = soup.find('ul', attrs = {'class', 'guideList4'})
    for city in citys.find_all('li'):
        city_text = unicode(city)
        #city_id += 1
        if city_text.find('<a href=') > 0:
            city_name = (city.a).string
            city_url = "http://j-sen.jp"+str((city.a)['href'])
            index = city_url.find('city_')+5
            city_id = city_url[index:][:-4]
            print "We crawling stations of city has id = "+str(city_id)
            insertStation(city_url)

def getGuideFromPrefectture(guide_url):
    global prefecture_id
    soup = readSoup(guide_url)
    guide_lists = soup.find('div', attrs = {'class', 'inner'})
    for guide_list in guide_lists.find_all('ul', attrs = {'class', 'guideList1'}):
        for guide_job in guide_list.find_all('a'):
            prefecture_id += 1
            guide_job_url = "http://j-sen.jp/"+str(guide_job['href'])
            getCity(guide_job_url)


if __name__ == '__main__':
    work_counter = 0
    prefecture_id = 0
    ############################################
    savefile = "data_work_station.sql"
    ############################################
    url = "j-sen.jp/guide_area.htm"
    ############################################
    f = codecs.open(savefile, 'w', 'utf-8')

    print "Begin crawl web " + url
    getGuideFromPrefectture(url)
    print "Crawled Completed!"
    print "Result data stored in the file has name : "+savefile
    f.close
