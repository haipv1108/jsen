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

#def getStation(line_url):
    #soup = readSoup(line_url)
    #stations = soup.find('ul', attrs = {'class', 'guideList4'})
    #for station in stations.find_all('a'):
        #station_name = station.string
        #station_link = str(station['href'])
        #flag1 = (station_link.find('station_')) + 8
        #flag2 = station_link.find('.htm')
        #station_id = int(station_link[flag1 : flag2])
        #tmp=u"INSERT INTO `jsen`.`station` (`station_id`, `station_name`, `prefecture_id`, `line_id`) VALUES"
        #tmp=tmp+u"("+unicode(station_id)+u",'"+station_name+u"',"+unicode(guide_area_id)+u","+unicode(line_id)+u");"
        #tmp=u"INSERT INTO `jsen`.`station` (`station_id`, `station_name`, `line_id`) VALUES"
        #tmp=tmp+u"("+unicode(station_id)+u",'"+station_name+u"',"+unicode(line_id)+u");"
        #f.write(tmp+'\n')

def getAreaLine(guide_area_link):
    #global line_id
    global line_counter, area_line_counter
    count = -1
    soup = readSoup(guide_area_link)
    yellow_box = soup.find('div', attrs = {'class', 'yellowBox'})
    lines = soup.find_all('ul', attrs = {'class', 'guideList3'})
    print "insert area_line..."
    for area_line in yellow_box.find_all('a'):
        area_line_name = area_line.string
        area_line_id = int(str(area_line['href'])[5:])
        count += 1
        area_line_counter += 1
        tmp=u"INSERT INTO `jsen`.`area_line` (`area_line_id`, `area_line_name`, `prefecture_id`) VALUES"
        tmp=tmp+u"("+unicode(area_line_id)+u",'"+area_line_name+u"',"+unicode(guide_area_id)+u");"
        f1.write(tmp+'\n')
        print "insert line......"
        for line in lines[count].find_all('a'):
            line_name = line.string
            line_link = str(line['href'])
            index = line_link.find('.htm')
            #line_url = "http://j-sen.jp"+line_link
            line_id = int(line_link[11:index])
            line_counter += 1
            tmp=u"INSERT INTO `jsen`.`line` (`line_id`, `line_name`, `area_line_id`) VALUES"
            tmp=tmp+u"("+unicode(line_id)+u",'"+line_name+u"',"+unicode(area_line_id)+u");"
            f2.write(tmp+'\n')
            #print line_url
            #getStation(line_url)
    print "done!"
    print "=======================================> Line Counter = "+str(line_counter)
    print "=======================================> Area Line Counter = "+str(area_line_counter)

def insertStationAndLine(guide_url):
    global guide_area_id
    step = 0
    soup = readSoup(guide_url)
    guide_lines = soup.find('div', attrs = {'class', 'inner'})
    for guide_line in guide_lines.find_all('ul', attrs = {'class', 'guideList1'}):
        for guide_area in guide_line.find_all('a'):
            guide_area_link = "http://j-sen.jp/"+str(guide_area['href'])
            step += 1
            guide_area_id = step
            print "Now we crawling at prefecture has id = " + str(guide_area_id)+" and link: "+guide_area_link
            getAreaLine(guide_area_link)


if __name__ == '__main__':
    area_line_counter = 0
    line_counter = 0
    ####################################
    #station_savefile = "data_station_line.sql"
    area_line_savefile = "data_area_line.sql"
    line_savefile = "data_line.sql"
    ####################################
    url = "j-sen.jp/guide_line.htm"
    ####################################
    #f = codecs.open(station_savefile, 'w', 'utf-8')
    f1 = codecs.open(area_line_savefile, 'w', 'utf-8')
    f2 = codecs.open(line_savefile, 'w', 'utf-8')

    print "Begin crawl web " + url
    insertStationAndLine(url)
    print "Crawled Completed!"
    print "Result data stored in the file(s) has name : "
    print area_line_savefile
    print line_savefile
    f1.close
    f2.close
