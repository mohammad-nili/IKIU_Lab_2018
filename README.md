# IKIU_Lab <img src="https://user-images.githubusercontent.com/74482108/126949943-83ea213c-e94a-4293-a297-0bf41c45928b.png" width="25">

[labs.ikiu.ac.ir/examination/](http://labs.ikiu.ac.ir/examination/)

# Features :
- Mellat Payment gateway <img src="https://way2pay.ir/wp-content/uploads/Behpardakht-Mellat-Logo-PNG-Way2pay-99-05-26.png" width="50">
- upper than 90 responsive Experiment's Form
- Flexible managment system for boss_lab & boss_uni to monitor whole process

# Users Type : 
<span>
<img src="https://user-images.githubusercontent.com/74482108/126951298-c9528655-6ecc-468d-9ebd-ffefa3dd2e62.png" width="50">
<img src="https://user-images.githubusercontent.com/74482108/126951406-184e6792-4f73-4d67-98ab-0ff72249af15.png" width="50">
<img src="https://user-images.githubusercontent.com/74482108/126951416-00bd3e83-4b57-40a3-b91e-cee3a0babeb3.png" width="50">
<img src="https://user-images.githubusercontent.com/74482108/126951425-4a8e9bef-46e9-4297-a270-8191545b158c.png" width="50">
<img src="https://user-images.githubusercontent.com/74482108/126951441-8e39dd72-377c-45f3-87f8-d52e3fe010ce.png" width="50">
<img src="https://user-images.githubusercontent.com/74482108/126951447-47f7f288-039f-4bad-90df-4391af01391b.png" width="50">
</span>

- boss_lab  : ( ADD_USER , EDIT_USER , ADD_EXAM , EDIT_EXAM , PAYMENT)
- boss_uni  : ( ADD_USER , EDIT_USER , ADD_EXAM , EDIT_EXAM , PAYMENT)
- customer  : ( REQUEST )
- expert    : ( ADD_EXAM , PAYMENT)
- manager   : ( ADD_EXAM , PAYMENT)
- reception : ( ADD_EXAM , PAYMENT)

# Requests Type : 
## 1- outer application [ online payment ]
At first Customer plea an experiment form from website
This plea automatically sent to Expert & after his/her confirmation redirected to Reception
A payment Id Automatically generated for customer's plea & Reception must check payment id & customer's id
and send bill to the Customer by the plea's parameters ; after successful payment the Expert sent result of Experiment + receipt to Customer

![lab_0](https://user-images.githubusercontent.com/74482108/126952806-9038f10f-810f-47c4-9d0e-a01fb9cdb156.png)

## 2- outer application [ offline payment ]
![lab_8](https://user-images.githubusercontent.com/74482108/126952963-0dc503f6-120f-4d9c-b9a4-efc26f057739.png)

## 3- inner application [local students]
At first Customer plea an experiment form from website
This plea automatically sent to Expert & after his/her confirmation redirected to Reception
A payment Id Automatically generated for customer's plea 
The faculty Manager of Customer must check payment id & customer's id [certify Free bill]
after successful certification the Expert sent result of Experiment + receipt to Customer

![lab_7](https://user-images.githubusercontent.com/74482108/126952956-b0f01a4e-22d9-40bb-bfc9-6cccae89e3ed.png)
