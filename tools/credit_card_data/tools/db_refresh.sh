#!/bin/bash

## yodobashi data create
rm -rf ../yodobashi/db_input.txt
cat ../yodobashi/*.csv | nkf | grep -v "リボ" | grep [0-9]*/[0-9]*/[0-9]* | cut -f 1,2,6 -d ',' > ../yodobashi/db_input.txt
cat ../yodobashi/*.csv | nkf | grep "リボ" | grep -v "キャッシングリボ" | grep [0-9]*/[0-9]*/[0-9]* | cut -f 1,2,3 -d ',' >> ../yodobashi/db_input.txt

## paypay data create
rm -rf ../paypay/db_input.txt
cat ../paypay/*.csv | grep [0-9]*/[0-9]*/[0-9]* | cut -f 1,2,8 -d ',' > ../paypay/db_input.txt

## yodobashi sokuho data create
cat ../sokuho/yodobashi/*.csv | nkf | grep [0-9]*/[0-9]*/[0-9]* | cut -f 1,2,7 -d ',' >> ../yodobashi/db_input.txt

## paypay sokuho data create
rm -rf ../sokuho/paypay/db_input.txt
rm -rf ../sokuho/paypay/db_input_base.txt
rm -rf ../sokuho/paypay/paypay_sokuho_adjust_1.txt
rm -rf ../sokuho/paypay/paypay_sokuho_adjust_2.txt
rm -rf ../sokuho/paypay/paypay_sokuho_adjust_3.txt
rm -rf ../sokuho/paypay/paypay_sokuho_actual.txt


SOKUHO_FILE=`ls ../sokuho/paypay`

sed 's/ //' ../sokuho/paypay/${SOKUHO_FILE} > ../sokuho/paypay/paypay_sokuho_adjust_1.txt
sed 's/PayPay もつ焼き 幸大/PayPayもつ焼き幸大/' ../sokuho/paypay/paypay_sokuho_adjust_1.txt > ../sokuho/paypay/paypay_sokuho_adjust_2.txt
sed 's/PayPayTOSYA KEBAB/PayPayTOSYAKEBAB/' ../sokuho/paypay/paypay_sokuho_adjust_2.txt > ../sokuho/paypay/paypay_sokuho_adjust_3.txt
sed 's/AmazonMarket Place/AmazonMarketPlace/' ../sokuho/paypay/paypay_sokuho_adjust_3.txt > ../sokuho/paypay/paypay_sokuho_actual.txt


PAYPAY_SOKUHO=(`cat ../sokuho/paypay/paypay_sokuho_actual.txt`)

for SOKUHO in ${PAYPAY_SOKUHO[@]}; do

    if [ ${LINE} ]; then
        LINE="${LINE},${SOKUHO//,/}"
    else
        LINE="${SOKUHO//,/}"
    fi

    if [ "${SOKUHO}" = "円" ]; then
        LINE="${LINE//,円/}"
        echo "${LINE}" >> ../sokuho/paypay/db_input_base.txt
        unset LINE
    fi

done


SOKUHO_BASE=(`cat ../sokuho/paypay/db_input_base.txt`)

for record in ${SOKUHO_BASE[@]}; do

    PARSER=(${record//,/ })

    if [ ${#PARSER[@]} -eq 3 ]; then
        PARSER[1]="${PARSER[1]//年//}"
        PARSER[1]="${PARSER[1]//月//}"
        PARSER[1]="${PARSER[1]//日/}"
        echo "\"${PARSER[1]}\",\"${PARSER[0]}\",\"${PARSER[2]}\"" >> ../sokuho/paypay/db_input.txt
    elif [ ${#PARSER[@]} -eq 4 ]; then
        PARSER[2]="${PARSER[2]//年//}"
        PARSER[2]="${PARSER[2]//月//}"
        PARSER[2]="${PARSER[2]//日/}"
        echo "\"${PARSER[2]}\",\"${PARSER[0]}${PARSER[1]}\",\"${PARSER[3]}\"" >> ../sokuho/paypay/db_input.txt
    fi

done


## load sql
mysql -u retort -p --password=retort < db_refresh.sql
