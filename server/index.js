const http = require("http");

let num1 = 10;
let imposterNum = "20";

console.log(parseInt(num1) + parseInt(imposterNum));

console.log(num1.toString() + imposterNum);

let varName = "hello";
let hello = "world";
console.log(hello);

console.log(JSON.stringify(varName.length >= hello.length));

class Circle {
  constructor(radius = 0) {
    this.radius = radius;
  }

  calcSizes() {
    return Math.PI * Math.pow(this.radius, 2);
  }
}

let smallCircle = new Circle(80);

console.log(
  smallCircle
    .calcSizes()
    .toFixed(2)
    .replace(/\B(?=(\d{3})+(?!\d))/g, " ")
);

const Deleteble = {
  delete() {
    let text = "You deleted him 😭";
    console.log(text);
    text = text.split(" ");
    console.log(JSON.stringify(text));
  },
};

class User {
  constructor(name = "", age = 0) {
    this.name = name;
    this.age = age;
  }

  showInfo() {
    console.log(`${this.name} ${this.age}`);
  }

  something() {
    console.log(`Excuse me, 'something' doesn't exist ;(`);
  }

  delete() {
    Deleteble.delete();
  }
}

let typicalUser = new User("Danylo", 18);
typicalUser.showInfo();
typicalUser.something();
typicalUser.delete();

const AdminLevels = {
  MainAdmin: 0,
  HelperOfTheMainAdmin: 1,
  HelperOfSomeHelperOfTheMainAdmin: 2,
  HelperOfSomeHelperOfSomeHelperOfTheMainAdmin: 3,
};

class Admin extends User {
  constructor(
    adminLevel = AdminLevels.HelperOfSomeHelperOfSomeHelperOfTheMainAdmin,
    name,
    age
  ) {
    super(name, age);
    this.adminLevel = adminLevel;
  }

  getLevel() {
    switch (this.adminLevel) {
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

  showInfo() {
    console.log(
      `${this.name} ${
        this.age
      } - ${this.getLevel()} of the ${Admin.getCompany()}`
    );
  }

  something() {
    console.log(`Excuse me, 'something' doesn't exist ;(`);
  }

  static getCompany() {
    return Admin.adminsCompany;
  }

  static setCompany(newCompany) {
    Admin.adminsCompany = newCompany;
  }
}

Admin.setCompany("JavaScript");

let typicalAdmin = new Admin(AdminLevels.MainAdmin, "Danylo", 18);
typicalAdmin.showInfo();
typicalAdmin.something();

class Owner {
  static #wasCreated = false;

  static getInstance() {
    if (!Owner.#wasCreated) {
      Owner.#wasCreated = true;
      return new Owner();
    }
    return null;
  }
}

let realOwner = Owner.getInstance();
let fakeOwner = Owner.getInstance();

console.log(JSON.stringify(realOwner));
console.log(JSON.stringify(fakeOwner));

const httpServer = http.createServer((req, res) => {
  if (req.method === "POST") {
    let body = "";
    req.on("data", (chunk) => {
      body += chunk.toString();
    });
    req.on("end", () => {
      console.log("Received POST data:");
      console.log(body);
      res.end("Data received and logged to console");
    });
  } else {
    res.writeHead(200, { "Content-Type": "text/html" });
    res.write("Hello world");
    res.end();
  }
});

httpServer.listen(8080, () => {
  console.log(`server is running on port 8080`);
});
