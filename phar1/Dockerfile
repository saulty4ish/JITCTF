FROM nimmis/apache-php5
RUN rm -rf /var/www/html/index.html
COPY ./src /var/www/html
RUN sudo chmod -R 777 /var/www/html/uploads
COPY ./flag.txt /
EXPOSE 80
