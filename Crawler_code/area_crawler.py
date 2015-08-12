# -*- coding: utf-8 -*-
import urllib2, unicodedata, codecs
from bs4 import BeautifulSoup

def readSoup(url):
    if url.find('http://') < 0:
        url = "http://" + url
    request = urllib2.Request(url)
    response = urllib2.urlopen(request)
    soup = BeautifulSoup(response, 'html.parser')
    return soup

def insertArea(url):
    global area_id, area_name
    area_id = 0
    soup = readSoup(url)
    areas = soup.find('div', attrs = {'class', 'jMap'})
    for area in areas.find_all('a'):
        area_name = area.string
        area_id += 1
        tmp=u"INSERT INTO Area (area_id, area_name) VALUES"
        tmp=tmp+u"("+unicode(area_id)+u",'"+area_name+u"');"
        f.write(tmp+'\n')

if __name__ == '__main__':
    savefile = 'data_area.sql'
    url = "http://j-sen.jp"
    f = codecs.open(savefile, 'w', 'utf-8')

    print "Begin crawl web " + url
    insertArea(url)
    print "Crawled completed!"
    f.close()
