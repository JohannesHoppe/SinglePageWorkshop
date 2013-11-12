using System;
using System.Collections.Generic;
using MongoDB.Bson;
using MongoDB.Bson.Serialization.Attributes;

namespace DeveloperMediaDemo.Models
{
    public class Note
    {
        public Note()
        {
            Title = String.Empty;
            Message = String.Empty;
            Added = DateTime.Now;
            Categories = new List<string>();
        }

        /// <summary>
        /// Gets or sets the "Primary Key" for EF (SQL), MongoDB and RavenDB
        /// </summary>
        /// <remarks>
        /// BsonId: When you inserting a document this generates a new unique value
        /// BsonRepresentation: The serializer will convert the ObjectId to a string when reading data and
        /// will convert the string back to an ObjectId when writing data to the database
        /// </remarks>
        [BsonId]
        [BsonRepresentation(BsonType.ObjectId)]
        public string Id { get; set; }

        public string Title { get; set; }

        public string Message { get; set; }

        public DateTime Added { get; set; }

        public List<string> Categories { get; set; }
    }
}