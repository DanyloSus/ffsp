// ignore_for_file: prefer_typing_uninitialized_variables, prefer_adjacent_string_concatenation, avoid_print, constant_identifier_names

import 'package:my_project_client/my_project_client.dart';
import 'package:flutter/material.dart';
import 'package:serverpod_flutter/serverpod_flutter.dart';

// Sets up a singleton client object that can be used to talk to the server from
// anywhere in our app. The client is generated from your server code.
// The client is set up to connect to a Serverpod running on a local server on
// the default port. You will need to modify this to connect to staging or
// production servers.
var client = Client('http://$localhost:8080/')
  ..connectivityMonitor = FlutterConnectivityMonitor();
final api = client.example;

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({super.key});

  @override
  Widget build(BuildContext context) {
    var varName = " ";
    return MaterialApp(
      home: Scaffold(
        appBar: AppBar(
          title: const Text('Flutter App'),
        ),
        body: Center(
          child: Column(
            mainAxisAlignment: MainAxisAlignment.center,
            children: [
              TextWithBreak((10 + int.parse('20')).toString()),
              const TextWithBreak('10' + '20'),
              const TextWithBreak('world'),
              TextWithBreak((varName.length >= 'world'.length).toString()),
              TextWithBreak((Circle(80).calcSizes()).toStringAsFixed(2)),
              const DeletebleWidget(),
              const UserWidget('Danylo', 18),
              const AdminWidget(AdminLevels.MainAdmin, 'Danylo', 18),
              const OwnerWidget(),
              ElevatedButton(
                onPressed: () async {
                  final result = await api.hello("World");
                  print(result);
                },
                child: const Text("Hello"),
              ),
            ],
          ),
        ),
      ),
    );
  }
}

class TextWithBreak extends StatelessWidget {
  final String text;

  const TextWithBreak(this.text, {super.key});

  @override
  Widget build(BuildContext context) {
    return Text(text);
  }
}

class Circle {
  final double radius;

  Circle(this.radius);

  double calcSizes() {
    return 3.14159265359 * (radius * radius);
  }
}

class Deleteble {
  static void delete() {
    String text = 'You deleted him 😭';
    print(text);
    List<String> textArray = text.split(" ");
    print(textArray.toString());
    print(textArray.toString());
  }
}

class DeletebleWidget extends StatelessWidget {
  const DeletebleWidget({super.key});

  @override
  Widget build(BuildContext context) {
    Deleteble.delete();
    return Container();
  }
}

class User {
  final String name;
  final int age;

  User(this.name, this.age);

  void showInfo() {
    print('$name $age');
  }

  void something() {
    print('Excuse me, \'something\' doesn\'t exist ;(');
  }

  void delete() {
    Deleteble.delete();
  }
}

class UserWidget extends StatelessWidget {
  final String name;
  final int age;

  const UserWidget(this.name, this.age, {super.key});

  @override
  Widget build(BuildContext context) {
    User user = User(name, age);
    user.showInfo();
    user.something();
    user.delete();
    return Container();
  }
}

enum AdminLevels {
  MainAdmin,
  HelperOfTheMainAdmin,
  HelperOfSomeHelperOfTheMainAdmin,
  HelperOfSomeHelperOfSomeHelperOfTheMainAdmin,
}

class Admin extends User {
  final AdminLevels adminLevel;
  static String adminsCompany = '';

  Admin(this.adminLevel, String name, int age) : super(name, age);

  String getLevel() {
    switch (adminLevel) {
      case AdminLevels.HelperOfSomeHelperOfSomeHelperOfTheMainAdmin:
        return "Helper Of Some Helper Of Some Helper Of The Main Admin";
      case AdminLevels.HelperOfSomeHelperOfTheMainAdmin:
        return "Helper Of Some Helper Of The Main Admin";
      case AdminLevels.HelperOfTheMainAdmin:
        return "Helper Of The Main Admin";
      case AdminLevels.MainAdmin:
        return "Main Admin";
      default:
        return "";
    }
  }

  @override
  void showInfo() {
    print('$name $age - ${getLevel()} of the ${getCompany()}');
  }

  @override
  void something() {
    print('Excuse me, \'something\' doesn\'t exist ;(');
  }

  static String getCompany() {
    return adminsCompany;
  }

  static void setCompany(String newCompany) {
    adminsCompany = newCompany;
  }
}

class AdminWidget extends StatelessWidget {
  final AdminLevels adminLevel;
  final String name;
  final int age;

  const AdminWidget(this.adminLevel, this.name, this.age, {super.key});

  @override
  Widget build(BuildContext context) {
    Admin.setCompany("JavaScript");
    Admin admin = Admin(adminLevel, name, age);
    admin.showInfo();
    admin.something();
    return Container();
  }
}

class Owner {
  static bool _wasCreated = false;

  static Owner? getInstance() {
    if (!_wasCreated) {
      _wasCreated = true;
      return Owner();
    }
    return null;
  }
}

class OwnerWidget extends StatelessWidget {
  const OwnerWidget({super.key});

  @override
  Widget build(BuildContext context) {
    Owner? realOwner = Owner.getInstance();
    Owner? fakeOwner = Owner.getInstance();
    print(realOwner.toString());
    print(fakeOwner.toString());
    return Container();
  }
}
