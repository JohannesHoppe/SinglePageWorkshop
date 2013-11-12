using System.Collections.Generic;
using System.Web.Http;
using DeveloperMediaDemo.Models;

namespace DeveloperMediaDemo.Controllers
{
    public class NoteController : ApiController
    {
        private readonly NoteRepository repository;

        public NoteController()
        {
            repository = new NoteRepository();
        }

        public IEnumerable<Note> GetAll()
        {
            return repository.ReadAll();
        }

        public Note Get(string id)
        {
            return repository.Read(id);
        }

        public string Post()
        {
            var newNote = new Note();
            return repository.Create(newNote);
        }

        public void Put(Note note)
        {
            repository.Update(note);
        }

        public void Delete(string id)
        {
            repository.Delete(id);
        }
    }
}