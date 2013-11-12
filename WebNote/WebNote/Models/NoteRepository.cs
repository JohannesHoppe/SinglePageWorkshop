using System.Collections.Generic;
using System.Configuration;
using System.Linq;
using MongoDB.Bson;
using MongoDB.Driver;
using MongoDB.Driver.Builders;
using MongoDB.Driver.Linq;
using Builders = MongoDB.Driver.Builders;

namespace DeveloperMediaDemo.Models
{
    /// <summary>
    /// This is a simple demo repository with no real database connection
    /// </summary>
    public class NoteRepository
    {
        private const string ConnectionStringName = "MongoDB";
        private const string DatabaseName = "WebNote";
        private const string CollectionName = "Notes";

        private readonly MongoCollection<Note> notes;

        public NoteRepository()
        {
            string connectionString = ConfigurationManager.ConnectionStrings[ConnectionStringName].ConnectionString;
            MongoClient client = new MongoClient(connectionString);
            MongoServer server = client.GetServer();
            MongoDatabase database = server.GetDatabase(DatabaseName);
            notes = database.GetCollection<Note>(CollectionName);            
        }

        public void Create(Note item)
        {
            notes.Insert(item);
        }

        public Note Read(string id)
        {
            return (from n in notes.AsQueryable()
                    where n.Id == id
                    select n).First();
        }

        public IEnumerable<Note> ReadAll()
        {
            return (from n in notes.AsQueryable()
                    orderby n.Id ascending
                    select n).ToList();
        }        
        
        public void Update(Note item)
        {
            Note note = Read(item.Id);

            note.Title = item.Title;
            note.Message = item.Message;
            note.Categories = item.Categories;

            var query = Query.EQ("_id", ObjectId.Parse(item.Id));
            notes.Update(query, Builders.Update.Replace(note));
        }

        public void Delete(string id)
        {
            notes.Remove(Query.EQ("_id", ObjectId.Parse(id)));
        }
    }
}