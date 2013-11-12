using System.Collections.Generic;
using System.Web.Http;
using DeveloperMediaDemo.Models;

namespace DeveloperMediaDemo.Controllers
{
    public class NoteController : ApiController
    {
        private NoteRepository repository;

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
            repository.Create(newNote);
            return newNote.Id;
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