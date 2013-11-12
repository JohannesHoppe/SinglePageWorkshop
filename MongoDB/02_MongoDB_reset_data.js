db.Notes.drop();

db.Notes.save(
  {
    "Title" : "Testeintrag",
    "Message" : "Ein gruener Postit",
    "Added" : new Date(2012, 05, 13),
    "Categories" : ["hobby", "private"]
  });

db.Notes.save(
  {
    "Title" : "Testeintrag 2",
    "Message" : "Ein roter Postit",
    "Added" : new Date(2012, 05, 14),
    "Categories" : ["important"]  
  });

db.Notes.save(
  {
    "Title" : "Testeintrag 3",
    "Message" : "Ein privater Postit",
    "Added" : new Date(2012, 05, 14),
    "Categories" : ["private"]  
  });