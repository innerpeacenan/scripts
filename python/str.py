tableNames = ('ffz_ana_delivary','ffz_ana_delivary_copy','ffz_ana_grossprofit','ffz_ana_order_summary','ffz_ana_order_summary_copy','ffz_ana_ordercate_summary','ffz_ana_product_trend','ffz_bsns_delivary','ffz_bsns_delivary_info','ffz_bsns_delivary_time','ffz_bsns_deliver','ffz_bsns_deliver_info','ffz_bsns_deliver_other','ffz_bsns_deliver_other_info','ffz_bsns_driver_delivary','ffz_bsns_driver_delivary_copy','ffz_bsns_logistics','ffz_bsns_logistics_detail','ffz_bsns_logistics_detail_copy','ffz_bsns_logistics_info','ffz_bsns_paid','ffz_bsns_paidlog','ffz_bsns_price_day','ffz_bsns_purchase_delivery','ffz_bsns_purchase_delivery_info','ffz_bsns_return_cause','ffz_bsns_return_cause_info','ffz_bsns_returngoods','ffz_bsns_returngoods_info','ffz_bsns_stock_history','ffz_bsns_stock_history_info','ffz_pub_associated_goods','ffz_pub_associated_goods_info','ffz_pub_cate','ffz_pub_cate3','ffz_pub_classify','ffz_pub_commission','ffz_pub_custom','ffz_pub_custom_archive','ffz_pub_custom_collect','ffz_pub_custom_contact','ffz_pub_custom_log','ffz_pub_depot','ffz_pub_depot_storager','ffz_pub_dispatch','ffz_pub_driver','ffz_pub_goods','ffz_pub_goods_copy','ffz_pub_goods_label','ffz_pub_inventory','ffz_pub_inventory_info','ffz_pub_label','ffz_pub_line_driver','ffz_pub_line_truck','ffz_pub_market_commission','ffz_pub_market_info','ffz_pub_market_role','ffz_pub_modify_price','ffz_pub_modify_priceinfo','ffz_pub_order','ffz_pub_order44','ffz_pub_order_0227','ffz_pub_orderinfo','ffz_pub_packtype','ffz_pub_plu','ffz_pub_plu_label','ffz_pub_plu_label_copy','ffz_pub_plu_label_link','ffz_pub_plu_label_link_copy','ffz_pub_plu_relation','ffz_pub_plu_relation_link','ffz_pub_preseppack_summary','ffz_pub_purchase','ffz_pub_purchase_copy','ffz_pub_purchase_info','ffz_pub_purchase_place','ffz_pub_purchase_price','ffz_pub_purchase_price_copy_copy','ffz_pub_purchase_stock','ffz_pub_regional','ffz_pub_regional1','ffz_pub_regional55','ffz_pub_regional_custom','ffz_pub_regional_custom1','ffz_pub_request','ffz_pub_request_info','ffz_pub_seppack','ffz_pub_seppack_h','ffz_pub_seppack_summary','ffz_pub_seppcinfo','ffz_pub_seppcinfo_h','ffz_pub_shift','ffz_pub_shift_info','ffz_pub_shift_info_copy','ffz_pub_stock','ffz_pub_stock_20160921','ffz_pub_stock_change','ffz_pub_stock_copy0921','ffz_pub_storage','ffz_pub_storage_info','ffz_pub_transport','ffz_pub_transport_custom','ffz_pub_truck','ffz_pub_unit_cost','ffz_pub_unit_cost77','ffz_pub_unit_cost_change','ffz_pub_unit_cost_history','ffz_pub_unit_cost_history_copy_copy','ffz_pub_unit_cost_history_ffz','ffz_pub_unit_cost_log','ffz_pub_user','ffz_sys_custom_grade','ffz_sys_department','ffz_sys_department_role','ffz_sys_level','ffz_sys_level_role','ffz_sys_node','ffz_sys_queue','ffz_sys_queue_copy','ffz_sys_role','ffz_sys_role_node','ffz_sys_user_role','ffz_sys_userlog');
length = len(tableNames)
print length
def exceptlist(arr):
    modellist = []
    for item in arr:
        newitem = item.split('_')
        seconditem = ''
        for j in range(1,len(newitem)):
            seconditem += newitem[j].capitalize()
        modellist.append(seconditem)
    return modellist

newlist = exceptlist(tableNames)
print(newlist);



