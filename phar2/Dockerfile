FROM nimmis/apache-php5
RUN rm -rf /var/www/html/index.html
COPY ./src /var/www/html
RUN chmod -R 777 /var/www/html
RUN chmod -R 777 /var/www/html/upload
EXPOSE 80
