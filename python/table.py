#!/usr/bin/env python
# encoding: utf-8

tableNames = (
    'ffz_ana_delivary',
    'ffz_ana_delivary_copy',
    'ffz_ana_grossprofit',
    'ffz_ana_order_summary',
    'ffz_ana_order_summary_copy',
    'ffz_ana_ordercate_summary',
    'ffz_ana_product_trend',
    'ffz_bsns_delivary',
    'ffz_bsns_delivary_info',
    'ffz_bsns_delivary_time',
    'ffz_bsns_deliver',
    'ffz_bsns_deliver_info',
    'ffz_bsns_deliver_other',
    'ffz_bsns_deliver_other_info',
    'ffz_bsns_driver_delivary',
    'ffz_bsns_driver_delivary_copy',
    'ffz_bsns_logistics',
    'ffz_bsns_logistics_detail',
    'ffz_bsns_logistics_detail_copy',
    'ffz_bsns_logistics_info',
    'ffz_bsns_paid',
    'ffz_bsns_paidlog',
    'ffz_bsns_price_day',
    'ffz_bsns_purchase_delivery',
    'ffz_bsns_purchase_delivery_info',
    'ffz_bsns_return_cause',
    'ffz_bsns_return_cause_info',
    'ffz_bsns_returngoods',
    'ffz_bsns_returngoods_info',
    'ffz_bsns_stock_history',
    'ffz_bsns_stock_history_info',
    'ffz_pub_associated_goods',
    'ffz_pub_associated_goods_info'
)

global length
length = len(tableNames)
if __name__ == '__main__':
    print(length)
