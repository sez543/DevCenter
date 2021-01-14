const mysql = require("mysql");
const md5 = require("md5");

var con = mysql.createConnection({
  host: "localhost",
  user: "root",
  password: "",
  database: "dev",
});

con.connect(function (err) {
  if (err) throw err;
  console.log("Connected!");
  for (var i = 1; i <= 100; i++) {
    var sql =
      "INSERT INTO `users`(`id`, `e-mail`, `password`, `First_Name`, `Last_Name`, `Phone_Number`, `Brief_Desription`, `Resume`, `Portfolio`, `Rating`, `LinkedIn`, `Twitter`, `Facebook`, `Instagram`, `GitHub`, `Profile_Picture`, `Is_Admin`, `Is_Moderator`, `Last_Login_Date`, `Registration_Date`) VALUES ('" +
      (i + 11) +
      "','user" +
      i +
      "@usermail.com','" +
      md5("password" + i) +
      "','User" +
      i +
      "','User" +
      i +
      "','+359000000000','Maecenas faucibus maximus sem eu placerat. Donec dapibus sem id hendrerit suscipit. Donec at congue justo, in fringilla neque. Duis dignissim mattis urna, id consectetur elit mollis vel. Maecenas at blandit leo, in maximus elit. Nullam nec lectus posuere odio dapibus congue. Etiam pretium nisi leo, quis malesuada sapien luctus quis.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet quam quis urna venenatis sollicitudin sed id ipsum. Proin porta augue in felis iaculis, et bibendum nunc dignissim. Ut aliquam quam lectus, vel eleifend erat cursus sit amet. Etiam volutpat bibendum enim, sed commodo nisl pretium at. Integer id volutpat elit. Vestibulum sem libero, eleifend quis pulvinar vel, molestie vitae justo. Integer ut lectus diam. Praesent quis justo fringilla, egestas urna ac, scelerisque nisl. Nam rutrum dictum turpis sed finibus. Curabitur in metus at risus faucibus tempus. Nam tincidunt, sem vitae fringilla porttitor, arcu nibh venenatis neque, a molestie tellus massa nec massa. Sed sagittis tincidunt vulputate. Ut varius eros eget nisi vehicula pretium. Maecenas faucibus maximus sem eu placerat. Donec dapibus sem id hendrerit suscipit. Donec at congue justo, in fringilla neque. Duis dignissim mattis urna, id consectetur elit mollis vel. Maecenas at blandit leo, in maximus elit. Nullam nec lectus posuere odio dapibus congue. Etiam pretium nisi leo, quis malesuada sapien luctus quis.Mauris nec ullamcorper eros. Curabitur non suscipit orci. Suspendisse potenti. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus efficitur ligula ipsum, et ullamcorper augue scelerisque non. Sed tincidunt molestie mattis. Phasellus rhoncus mauris id magna dapibus, a posuere lectus semper. Phasellus justo ex, pretium eu laoreet nec, porta eu magna. Nullam at sagittis magna. Fusce vulputate, metus et consectetur placerat, metus nulla accumsan tellus, lacinia varius ligula justo vitae metus. Fusce quis elementum eros, a finibus metus. Aliquam feugiat malesuada malesuada. Curabitur porttitor dapibus odio, non rhoncus tellus pellentesque non. Vestibulum eu convallis odio.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet quam quis urna venenatis sollicitudin sed id ipsum. Proin porta augue in felis iaculis, et bibendum nunc dignissim. Ut aliquam quam lectus, vel eleifend erat cursus sit amet. Etiam volutpat bibendum enim, sed commodo nisl pretium at. Integer id volutpat elit. Vestibulum sem libero, eleifend quis pulvinar vel, molestie vitae justo. Integer ut lectus diam. Praesent quis justo fringilla, egestas urna ac, scelerisque nisl. Nam rutrum dictum turpis sed finibus. Curabitur in metus at risus faucibus tempus. Nam tincidunt, sem vitae fringilla porttitor, arcu nibh venenatis neque, a molestie tellus massa nec massa. Sed sagittis tincidunt vulputate. Ut varius eros eget nisi vehicula pretium. Maecenas faucibus maximus sem eu placerat. Donec dapibus sem id hendrerit suscipit. Donec at congue justo, in fringilla neque. Duis dignissim mattis urna, id consectetur elit mollis vel. Maecenas at blandit leo, in maximus elit. Nullam nec lectus posuere odio dapibus congue. Etiam pretium nisi leo, quis malesuada sapien luctus quis. Mauris nec ullamcorper eros. Curabitur non suscipit orci. Suspendisse potenti. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Vivamus efficitur ligula ipsum, et ullamcorper augue scelerisque non. Sed tincidunt molestie mattis. Phasellus rhoncus mauris id magna dapibus, a posuere lectus semper. Phasellus justo ex, pretium eu laoreet nec, porta eu magna. Nullam at sagittis magna. Fusce vulputate, metus et consectetur placerat, metus nulla accumsan tellus, lacinia varius ligula justo vitae metus. Fusce quis elementum eros, a finibus metus. Aliquam feugiat malesuada malesuada. Curabitur porttitor dapibus odio, non rhoncus tellus pellentesque non. Vestibulum eu convallis odio.','" +
      Math.round(Math.random() * 5 + 1) +
      "','User" +
      i +
      "','@User" +
      i +
      "','User" +
      i +
      "','User" +
      i +
      "','User" +
      i +
      "','media/profile/user" +
      i +
      "','0','0','0','0')";
    con.query(sql, (err, result) => {
      if (err) throw err;
      console.log(`Comment {i} created`);
    });
  }
});
