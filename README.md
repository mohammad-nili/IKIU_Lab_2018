# IKIU_Lab <img src="https://user-images.githubusercontent.com/74482108/126949943-83ea213c-e94a-4293-a297-0bf41c45928b.png" width="25">

[labs.ikiu.ac.ir/examination/](http://labs.ikiu.ac.ir/examination/)

# Features :
- Mellat Payment gateway <img src="https://way2pay.ir/wp-content/uploads/Behpardakht-Mellat-Logo-PNG-Way2pay-99-05-26.png" width="50">
- upper than 90 responsive Experiment's Form
- Flexible managment system for boss_lab & boss_uni to monitor whole process

# Users Type : 
<span>
<img src="https://user-images.githubusercontent.com/74482108/127734403-dee5fbc2-474f-4393-9a28-423d2e3c69e3.png" width="50">
<img src="https://user-images.githubusercontent.com/74482108/127734404-524f6f0f-9af6-4ad4-9e3d-1493efb9587d.png" width="50">
<img src="https://user-images.githubusercontent.com/74482108/127734405-cb8d7667-a880-4abf-a96a-3a72d246f6ac.png" width="50">
<img src="https://user-images.githubusercontent.com/74482108/127734410-4f516f63-66d0-4686-9123-5f1a45eb3289.png" width="50">
<img src="https://user-images.githubusercontent.com/74482108/127734412-1d4483f3-1db3-4345-9dac-a17f3935d0f8.png" width="50">
<img src="https://user-images.githubusercontent.com/74482108/127734415-81b2f573-e96f-46b5-b74e-b93d113f1fe0.png" width="50">
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

![lab_0](https://user-images.githubusercontent.com/74482108/127734658-5b18e0cd-c56f-4f39-b941-41dbb361d5dd.png)

## 2- outer application [ offline payment ]
![lab_8](https://user-images.githubusercontent.com/74482108/127734659-81aa81ad-2b7b-4bbb-95a1-c5c33b69cab0.png)

## 3- inner application [local students]
At first Customer plea an experiment form from website
This plea automatically sent to Expert & after his/her confirmation redirected to Reception
A payment Id Automatically generated for customer's plea 
The faculty Manager of Customer must check payment id & customer's id [certify Free bill]
after successful certification the Expert sent result of Experiment + receipt to Customer

![lab_7](https://user-images.githubusercontent.com/74482108/127734660-b0eb0a0b-7875-440d-b1cf-2354fa0c7967.png)
